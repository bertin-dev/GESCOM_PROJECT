PGDMP     *    %                y            public    13.2    13.2 	    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16395    public    DATABASE     b   CREATE DATABASE public WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'French_France.1252';
    DROP DATABASE public;
                postgres    false            �            1259    16396 
   v_factures    TABLE     }  CREATE TABLE public.v_factures (
    num_facture integer,
    total_ht integer,
    total_ttc integer,
    id_personne integer,
    etat_fact "char",
    reste_a_payer_patient integer,
    part_patient text,
    net_a_payer integer,
    nom_personne text,
    prenom_personne text,
    sexe_personne boolean,
    lieu_naissance text,
    telephone text,
    id integer NOT NULL
);
    DROP TABLE public.v_factures;
       public         heap    postgres    false            �            1259    16404    v_factures_id_seq    SEQUENCE     �   ALTER TABLE public.v_factures ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.v_factures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    200            �          0    16396 
   v_factures 
   TABLE DATA                 public          postgres    false    200   @	       �           0    0    v_factures_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.v_factures_id_seq', 1, false);
          public          postgres    false    201            #           2606    16413    v_factures v_factures_pk 
   CONSTRAINT     V   ALTER TABLE ONLY public.v_factures
    ADD CONSTRAINT v_factures_pk PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.v_factures DROP CONSTRAINT v_factures_pk;
       public            postgres    false    200            �   
   x���         