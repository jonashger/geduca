package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QResponsavel is a Querydsl query type for Responsavel
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QResponsavel extends EntityPathBase<Responsavel> {

    private static final long serialVersionUID = 1936841416L;

    public static final QResponsavel responsavel = new QResponsavel("responsavel");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final NumberPath<Long> codigoTipoResponsavel = createNumber("codigoTipoResponsavel", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QResponsavel(String variable) {
        super(Responsavel.class, forVariable(variable));
    }

    public QResponsavel(Path<? extends Responsavel> path) {
        super(path.getType(), path.getMetadata());
    }

    public QResponsavel(PathMetadata<?> metadata) {
        super(Responsavel.class, metadata);
    }

}

